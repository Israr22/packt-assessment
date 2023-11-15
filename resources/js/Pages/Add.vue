<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Book</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                    <input type="number" class="form-control" v-model="book.isbn">
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
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name:"add-book",
    data(){
        return {
            book:{
                title:"",
                author:"",
                genre:"",
                isbn:"",
                published:"",
                publisher:"",
                description:""
            }
        }
    },
    methods:{
        async create(){
            await axios.post('/api/book', this.book).then(response=>{
                this.$router.push({name:"Index"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>