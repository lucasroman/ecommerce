import ReactDOM from 'react-dom/client';

// Find HTML element where are data
const comp = document.querySelector("#component");

// Get data from laravel view (Json format)
const dataUser = comp.dataset.user;

// Parse Json for access to all items. E.g. user['keyName']
const user = JSON.parse(dataUser);

function Component() {
  return (
    <>
      <h2>Component</h2>
      <h2>Name: {user['name']}</h2>
      <h2>Email: {user['email']}</h2>
    </>
  )
}

ReactDOM.createRoot(document.getElementById('component')).render(
  <>
    <Component />
  </>
);