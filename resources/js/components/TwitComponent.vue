<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Username</th>
                            <th>Content</th>
                            <th>CreatedAt</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr v-for="twit in twits">
                            <th>{{ twit.Id }}</th>
                            <td>{{ twit.CategoryId }}</td>
                            <td>{{ twit.Username }}</td>
                            <td>{{ twit.Content }}</td>
                            <td>{{ twit.CreatedAt }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                twits: [],
                loading: false
            }
        },
        mounted() {
            this.getTwits()
        },
        methods: {
            getTwits: function() {

                this.loading = true;

                axios.get('/twits/get-twits-json').then((response) => {
                    console.log(response.data);
                    this.twits = response.data;
                    this.loading = false;
                });
            }
        }
    }
</script>
