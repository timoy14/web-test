<template>
  <div>
    <h2>Registration Form</h2>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" required>
      </div>
      <div>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" v-model="confirmPassword" required>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</template>

<script>
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
      fetch('http://your-api-url/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
      })
        .then(response => response.json())
        .then(data => {
          // Handle the API response here
          if (data.success) {
            alert('Registration successful!');
            this.resetForm();
          } else {
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
