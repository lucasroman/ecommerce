import React from 'react';
import { useState } from 'react';

const app = document.querySelector("#app");
const name = app.dataset.name;
// Laravel send array of objects as text plain (string)
// It's needed convert it to Json with 'parse' function
const users = JSON.parse(app.dataset.users);

export default function UserList() {
  const [check, setCheck] = useState(false);
  
  return (
    <>
      <main className="py-4">
      <div className="container">
      <div className="row justy-content-center">
      <div className="col-md-12">

      <div className="card">
        <div className="card-header">User List</div>
        <div className="card-body">
          <table className="table table-hover table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
              </tr>
            </thead>
            <tbody>
              {users.map(user =>
                <tr>
                  <th>{user.id}</th>
                  <td>{user.name}</td>
                  <td>{user.email}</td>
                  <td>
                    <input type="checkbox"
                    dataId={user.id}
                    className="js-switch"
                    onClick={() => setCheck(!check)}
                    />
                  </td>
                  <td>{user.created_at}</td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </div>
      </div>
      </div>
      </div>
      </main>
    </>
  );
}