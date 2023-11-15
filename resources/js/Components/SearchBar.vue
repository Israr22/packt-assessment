<template>
  <div class="global-search">
    <div class="input-group">
      <input
        v-model="searchQuery"
        @input="search"
        type="text"
        class="form-control"
        placeholder="Search..."
      />
    </div>
    <div :class="{ show: searchQuery }" class="dropdown-menu" style="min-width: 42%;">
      <div v-if="searchResults.length>0">
          <router-link
            v-for="result in searchResults"
            :key="result.id"
            class="dropdown-item border border-primary"
            :to='{name: "bookView", params:{id:result.id}}'
            >
            <p><strong>Title:- </strong>{{ result.title }} <strong>Author:- </strong>{{ result.author }} <strong>Genre:- </strong>{{ result.genre }}</p> 
            <p><strong>Description:- </strong>{{result.description}}</p>
            <p><strong>ISBN:- </strong>{{result.isbn}} <strong>Published:- </strong>{{result.published}} <strong>Publisher:- </strong>{{result.publisher}}</p>
          </router-link>
      </div>
      <div v-else class="text-center">
        <strong><p>No result found!</p></strong>
      </div>
      
    </div>
  </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        searchQuery: '',
        searchResults: [],
        selectedItem: null,
        isDropdownOpen: false,
      };
    },
    
    methods: {
      async search() {
        await axios.get('api/search-data',{
        params: {
            query: this.searchQuery
        }
    }).then(response=>{
                this.searchResults = response.data;
            }).catch(error=>{
                console.log(error);
                this.searchResults = [];
            })
      }
    },
  };
  </script>
  
  <style scoped>
  /* Your component styles here */
  </style>