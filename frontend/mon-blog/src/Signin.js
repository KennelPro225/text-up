import React, { useState } from 'react';
import axios from 'axios';
function LoginPage() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  const handlePasswordChange = (event) => {
    setPassword(event.target.value);
  };

  function setToken(userToken) {
    sessionStorage.setItem('token', JSON.stringify(userToken));
  }

  function setUserData(userData) {
    sessionStorage.setItem('user', JSON.stringify(userData));
  }

  function getToken() {
    const tokenString = sessionStorage.getItem('token');
    const userToken = JSON.parse(tokenString);
    return userToken
  }

  function getUserData() {
    const tokenString = sessionStorage.getItem('user');
    const userToken = JSON.parse(tokenString);
    return userToken
  }

  function Login({ email, password }) {
    axios.post('http://127.0.0.1:8000/api/v1/auth/connexion', {
      email: email,
      password: password
    })
      .then(function (response) {
        // handle success
        setToken(response.data.data.token)
        setUserData(response.data.data)
        console.log(response);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .finally(function () {
        // always executed
      });
  }
  const handleSubmit = (event) => {
    event.preventDefault();
    // Ici, vous pouvez ajouter le code pour l'authentification
    Login({ email, password });
    console.log(`email: ${email}, Password: ${password}`);
  };

  return (
    <div>
      <form class="max-w-sm mx-auto" onSubmit={handleSubmit}>
        <h2>Connexion</h2>
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-600">Your email</label>
          <input type="email" value={email} onChange={handleEmailChange} id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-600">Your password</label>
          <input type="password" id="password" value={password} onChange={handlePasswordChange} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>

    </div>
  );
}

export default LoginPage;
