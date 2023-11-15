<template>
    <div class="row">
        <SearchBar class="col-6 mb-2"/>
        <div class="col-6 mb-2 text-end">
            <router-link :to='{name:"bookAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>ISBN</th>
                                    <th>Published</th>
                                    <th>Publisher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="loading" class="text-center">
                                <tr>
                                  <td colspan="9">
                                    <div class="spinner-border text-primary" role="status">
                                      <span class="visually-hidden">Loading...</span>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            <tbody v-else-if="books.length > 0">
                                <tr v-for="(book,key) in books" :key="key">
                                    <td>{{ (currentPage - 1)*itemsPerPage + key + 1 }}</td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.genre }}</td>
                                    <td>{{ book.description }}</td>
                                    <td>{{ book.isbn }}</td>
                                    <td>{{ book.published }}</td>
                                    <td>{{ book.publisher }}</td>
                                    <td class="d-flex">

                                        <router-link :to='{name: "bookView", params:{id:book.id}}' class="p-xl-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                                <path fill="currentColor" d="M30.94 15.66A16.69 16.69 0 0 0 16 5A16.69 16.69 0 0 0 1.06 15.66a1 1 0 0 0 0 .68A16.69 16.69 0 0 0 16 27a16.69 16.69 0 0 0 14.94-10.66a1 1 0 0 0 0-.68ZM16 25c-5.3 0-10.9-3.93-12.93-9C5.1 10.93 10.7 7 16 7s10.9 3.93 12.93 9C26.9 21.07 21.3 25 16 25Z"/>
                                                <path fill="currentColor" d="M16 10a6 6 0 1 0 6 6a6 6 0 0 0-6-6Zm0 10a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/>
                                            </svg>
                                        </router-link>

                                        <router-link :to='{name:"bookEdit",params:{id:book.id}}' class="p-xl-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3"/></g></svg>
                                        </router-link>

                                        <button type="button" @click="deleteBook(book.id)" class="bg-body border-0 text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7Zm2-4h2V8H9v9Zm4 0h2V8h-2v9Z"/></svg>
                                        </button>
                                        
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="9" align="center">No Book Found.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="bg-light rounded">
                            <nav class="text-center">
                                <button @click="getBooks(currentPage-1)" :disabled="currentPage === 1"
                                    :class="{'text-primary': currentPage !== 1 }"
                                    class="btn btn-link py-3 px-4">
                                    Previous
                                </button>
                                <span class="text-sm px-4">{{displayRange}}</span>
                                <button @click="getBooks(currentPage+1)" :disabled="currentPage === lastPage"
                                    :class="{'text-primary': currentPage !== lastPage }"
                                    class="btn btn-link py-3 px-4">
                                    Next
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import SearchBar from '../components/SearchBar.vue';
export default {
    name:"books",
    components:{SearchBar},

    data(){
        return {
            books:[],
            loading: false,
            currentPage: 2,
            lastPage: 0,
            itemsPerPage: 0,
            totalItems: 0
        }
    },

    mounted(){
        this.getBooks()
    },

    computed:{
        displayRange() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage + 1;
            const endIndex = startIndex + this.itemsPerPage - 1;
            return `${startIndex}-${endIndex} of ${this.totalItems}`;
        }
    },

    methods:{
        async getBooks(page=1){
            this.loading = true;
            await axios.get(`/api/book?page=${page}`).then(response=>{
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.itemsPerPage = response.data.per_page;
                this.totalItems = response.data.total;
                this.books = response.data.data;
                this.loading = false;
            }).catch(error=>{
                console.log(error);
                this.books = [];
                this.loading = false;
            })
        },
        deleteBook(id){
            if(confirm("Are you sure to delete this book ?")){
                axios.delete(`/api/book/${id}`).then(response=>{
                    this.getBooks();
                }).catch(error=>{
                    console.log(error);
                })
            }
        }
    }
}
</script>