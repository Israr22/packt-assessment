<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Details Book:- {{book.title}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="title" class="col-md-2 mb-3"> <strong> Title </strong></label>
                        <p class="col-md-6 mb-3">{{book.title}}</p>
                    </div>

                    <div class="row">
                        <label for="author" class="col-md-2 mb-3"> <strong> Author </strong></label>
                        <p class="col-md-6 mb-3">{{book.author}}</p>
                    </div>

                    <div class="row">
                        <label for="genre" class="col-md-2 mb-3"> <strong> Genre </strong></label>
                        <p class="col-md-6 mb-3">{{book.genre}}</p>
                    </div>

                    <div class="row">
                        <label for="isbn" class="col-md-2 mb-3"> <strong> ISBN </strong></label>
                        <p class="col-md-6 mb-3">{{book.isbn}}</p>
                    </div>

                    <div class="row">
                        <label for="published" class="col-md-2 mb-3"> <strong> Published </strong></label>
                        <p class="col-md-6 mb-3">{{book.published}}</p>
                    </div>

                    <div class="row">
                        <label for="publisher" class="col-md-2 mb-3"> <strong> Publisher </strong></label>
                        <p class="col-md-6 mb-3">{{book.publisher}}</p>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-2 mb-3"> <strong> Description </strong></label>
                        <p class="col-md-6 mb-3">{{book.description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:"update-book",
    data(){
        return {
            book:{
                title:"Mouse heard this.",
                author:"Sydney Koepp",
                genre:"Option",
                isbn:"1234567890",
                published:"1981-12-24",
                publisher:"t Magnam",
                description:"I can't take more.' 'You mean you can't help it,' said the youth, 'and your jaws are too weak For anything tougher than suet; Yet you finished the goose, with the lobsters and the little golden key."
            }
        }
    },
    mounted(){
        this.showBook()
    },
    methods:{
        async showBook(){
            await axios.get(`/api/book/${this.$route.params.id}`).then(response=>{
                this.book = response.data;
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>