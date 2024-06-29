// Requires below makes that React DOESN'T WORK! Keep that in mind
// require('./bootstrap');
// require('./test');



import ReactDOM from 'react-dom/client';
import Test from './test';

ReactDOM.createRoot(document.getElementById('app')).render(
  <Test />
);