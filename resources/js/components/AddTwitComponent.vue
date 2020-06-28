<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <input type="hidden" v-model="name" name="name">
    
                <div class="row">
    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                        <select class="form-control" v-model="category" name="category">
                            <option value="">Выберите категорию</option>
                            <option value="1">Общие</option>
                            <option value="2">Ковид</option>
                            <option value="3">Шутки</option>
                        </select>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                        <textarea class="form-control" v-model="text" name="text" placeholder="Введите сообщение"></textarea>
                    </div>
    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-right">
                        <button class="btn btn-info" @click="addTwit">
                            Отправить
                        </button>
                    </div>

                </div>

            </div>
        </div>

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
                name: 'anonymous',
                category: '',
                text: '',
            }
        },
        mounted() {
            
            var socket = io('http://127.0.0.1:3000');

            socket.on("laravel_database_add-twit-action:App\\Events\\AddTwitEvent", function(data){
                this.twits = data.result.twits;
            }.bind(this));

            this.getTwits()
        },
        methods: {
            getTwits: function() {

                axios.get('/twits/get-twits-json').then((response) => {
                    this.twits = response.data;
                });
            },
            addTwit: function() {

                axios({
                    method: 'get',
                    url: '/twits/event-add-twit',
                    params: {
                        name: this.name,
                        category: this.category,
                        text: this.text,
                    }
                }).then((response) => {
                    this.twits = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
