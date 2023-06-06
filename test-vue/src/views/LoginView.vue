<template>
  <div class="container">
    <div class="row">
    <h2>Login Form</h2>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" v-model="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" v-model="password" required>
      </div>
      <button class="btn btn-success" type="submit">Login</button>
    </form>
  </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <label for="name_data">Name:</label>
        </div>
        <div class="row">
          <p v-text="name_data"></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <label for="name_data">Name:</label>
        </div>
        <div class="row">
          <p v-text="name_email"></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <label for="last_login">Last Login:</label>
        </div>
        <div class="row">
          <p v-text="last_login"></p>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      name_data: '',
      name_email: '',
      last_login: ''
    };
  },
  methods: {
    submitForm() {

      // Prepare the form data
      const formData = {
        email: this.email,
        password: this.password
      };

      // Make an HTTP POST request to the Laravel API
      axios
        .post('http://127.0.0.1:8000/api/login', formData)
        .then(response => {
          // Handle the API response here
          if (response.data.token) {
            
            console.log(response);
            this.name_data = response.data.user.name;
            this.name_email = response.data.user.email;
            this.last_login = response.data.user.last_login;
            
          } else {
            console.log(response);
            alert('Registration failed. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred. Please try again later.');
        });
    },

    resetForm() {
      this.name = '';
      this.email = '';
      this.password = '';
      this.confirmPassword = '';
    }
  }
};

</script>
