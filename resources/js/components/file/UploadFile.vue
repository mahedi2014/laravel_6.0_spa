<template>
    <div>

        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">List of Files</h3>
                <div class="card-body">
                    <table class="table">
                        <th>Name</th>
                        <th>Size (Bytes)</th>
                        <tr v-for="book in books" :key="book.id">
                            <td>{{ book.filename  }}</td>
                            <td>{{ book.size   }}</td>
                        </tr>
                    </table>
                </div>
            </div>



            <div class="col-md-6">
                <h3 class="text-center">Add File</h3>
                <div class="large-12 medium-12 small-12 filezone">
                    <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                    <p>
                        Drop your files here <br>or click to search
                    </p>
                </div>

                <div v-for="(file, key) in files" class="file-listing">
                    <img class="preview" v-bind:ref="'preview'+parseInt(key)"/>
                    {{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key)">Remove</a>
                    </div>
                </div>

                <a class="submit-button" v-on:click="submitFiles()" v-show="files.length > 0">Submit</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: [],
                files: []
            }
        },
        created() {
            this.axioClient.get('/file/')
                .then(response => {
                    this.books = response.data;
                });
        },

        methods: {
            handleFiles() {
                let uploadedFiles = this.$refs.files.files;

                for(var i = 0; i < uploadedFiles.length; i++) {
                    this.files.push(uploadedFiles[i]);
                }
                this.getImagePreviews();
            },
            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){

                    if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs['preview'+parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs['preview'+parseInt(i)][0].src = '/img/generic.png';
                        });
                    }
                }
            },
            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },
            submitFiles() {
                for( let i = 0; i < this.files.length; i++ ){
                    if(this.files[i].id) {
                        continue;
                    }
                    let formData = new FormData();
                    formData.append('file', this.files[i]);

                    this.axios.post('/api/file/add',
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(data) {
                        this.files[i].id = data['data']['id'];
                        this.files.splice(i, 1, this.files[i]);
                        console.log('success');
                        this.$router.push({name: 'file-upload'});
                    }.bind(this)).catch(function(data) {
                        console.log('error');
                    });
                }
            }
        }
    }
</script>

<style scoped>
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    div.file-listing img{
        max-width: 90%;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img{
        height: 100px;
    }
    div.success-container{
        text-align: center;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    a.submit-button{
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: #CCC;
        color: white;
        font-weight: bold;
        margin-top: 20px;
    }
</style>
