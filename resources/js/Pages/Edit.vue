<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Book</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="book.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" class="form-control" v-model="book.author">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input type="text" class="form-control" v-model="book.genre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" v-model="book.isbn">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Published</label>
                                    <input type="date" class="form-control" v-model="book.published">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Publisher</label>
                                    <input type="text" class="form-control" v-model="book.publisher">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" v-model="book.description" style="min-height: 120px;">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                      
                    </form>
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
        },
        async update(){
            await axios.patch(`/api/book/${this.$route.params.id}`, this.book).then(response=>{
                this.$router.push({name:"Index"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>