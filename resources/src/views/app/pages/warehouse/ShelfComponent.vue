<template>
    <div>
      <h1>Shelves</h1>
      <div>
        <form @submit.prevent="createShelf">
          <div>
            <label for="name">Name:</label>
            <input v-model="newShelf.name" id="name" type="text" required />
          </div>
          <div>
            <label for="description">Description:</label>
            <textarea v-model="newShelf.description" id="description"></textarea>
          </div>
          <button type="submit">Create Shelf</button>
        </form>
      </div>
  
      <h2>List of Shelves</h2>
      <ul>
        <li v-for="shelf in shelves" :key="shelf.id">
          <strong>{{ shelf.name }}</strong>: {{ shelf.description }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        shelves: [],
        newShelf: {
          name: "",
          description: "",
        },
      };
    },
    methods: {
      fetchShelves() {
        axios
          .get("/api/shelves")
          .then((response) => {
            this.shelves = response.data;
          })
          .catch((error) => {
            console.error("Error fetching shelves:", error);
          });
      },
      createShelf() {
        axios
          .post("/api/shelves", this.newShelf)
          .then((response) => {
            alert(response.data.message);
            this.shelves.push(response.data.shelf);
            this.newShelf.name = "";
            this.newShelf.description = "";
          })
          .catch((error) => {
            console.error("Error creating shelf:", error);
            alert("Failed to create shelf. Please try again.");
          });
      },
    },
    mounted() {
      this.fetchShelves();
    },
  };
  </script>
  
  <style scoped>
  form {
    margin-bottom: 20px;
  }
  form div {
    margin-bottom: 10px;
  }
  button {
    cursor: pointer;
  }
  </style>
  