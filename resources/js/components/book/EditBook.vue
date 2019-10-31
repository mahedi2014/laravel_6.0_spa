<template>
    <div>
        <h3 class="text-center">Edit</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="book.name">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" v-model="book.author">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                book: {}
            }
        },
        mounted(){
            this.getBook();
        },
        methods: {
            getBook() {
                this.axioClient.get('/book/edit/'+this.$route.params.id)
                    .then(response => {
                        this.book = response.data;
                    });
            },
            updateBook() {
                this.axioClient.put('/book/update/'+this.$route.params.id, this.book)
                    .then(response => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
