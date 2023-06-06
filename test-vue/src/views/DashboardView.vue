<template>
  <div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" required>
      </div>
      <button type="submit">Login</button>
  </div>
</template>

<script>
import axios from 'axios';
import store from './store';
const apiToken = 'YOUR_API_TOKEN';

import { eventBus } from './event-bus';

export default {
  created() {
    store.$on('loginDataReceived', loginData => {
      console.log(loginData); // Access the login data here
    });
  }
};


// export default {
//   data() {
//     return {
//       name: '',
//       email: '',
//       password: '',
//       confirmPassword: ''
//     };
//   },
//   methods: {
//     submitForm() {

//       // Prepare the form data
//       const formData = {
//         email: this.email,
//         password: this.password
//       };

//       // Make an HTTP POST request to the Laravel APIconst apiToken = 'YOUR_API_TOKEN';
//       axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken}`;
//       axios
//         .post('http://127.0.0.1:8000/api/user', formData)
//         .then(response => {
//           // Handle the API response here
//           if (response.data.success) {
//             this.$router.push({ name: 'dashboard', query: { redirect: '/path' } });
//           } else {
//             console.log(response);
//             alert('Registration failed. Please try again.');
//           }
//         })
//         .catch(error => {
//           console.error('Error:', error);
//           alert('An error occurred. Please try again later.');
//         });
//     },

//     resetForm() {
//       this.name = '';
//       this.email = '';
//       this.password = '';
//       this.confirmPassword = '';
//     }
//   }
// };
</script>
