// Bootstrap makes REACT DOESN'T WORK!
// Enable boostrap import below cause that ReactJS doesn't work
// import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { StrictMode } from 'react';
import ReactDOM from 'react-dom/client';
import Portfolio from './portolio';

ReactDOM.createRoot(document.getElementById('app')).render(
  <StrictMode>
    <Portfolio />
  </StrictMode>
);
