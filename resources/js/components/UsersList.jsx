import React from 'react';

const app = document.querySelector("#app");
const name = app.dataset.name;
// Laravel send array of objects as text plain (string)
// It's needed convert it to Json with 'parse' function
const users = JSON.parse(app.dataset.users);

export default function UserList() {
  return (
    <>
      <h1>Test component working!!!!! </h1>
      <ul>
        {users.map(user => <li key={user.id}>{user.name}</li>)}
      </ul>
    </>
  );
}