<template>
    <div>
        <h3 class="text-center">All Users</h3><br/>
        {{users}}


    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        created() {
                    this.users = 'mahedi';
        },
        methods: {

        }
    }
</script>
