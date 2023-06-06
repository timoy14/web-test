<template>
  <div class="container">
    <h2>Registration Form</h2>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" v-model="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" v-model="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" v-model="password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input class="form-control" type="password" id="confirmPassword" v-model="confirmPassword" required>
      </div>
      <button class="btn btn-success" type="submit">Register</button>
    </form>
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
      confirmPassword: ''
    };
  },
  methods: {
    submitForm() {
      // Perform form validation here
      if (this.password !== this.confirmPassword) {
        alert('Passwords do not match.');
        return;
      }

      // Prepare the form data
      const formData = {
        name: this.name,
        email: this.email,
        password: this.password
      };

      // Make an HTTP POST request to the Laravel API
      axios
        .post('http://127.0.0.1:8000/api/register', formData)
        .then(response => {
          // Handle the API response here
          if (response.data.success) {
            console.log(response);
            console.log("test");
            alert('Registration successful!');
            this.resetForm();
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
