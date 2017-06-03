import React from 'react';
import ReactDOM from 'react-dom';
import 'normalize.css';
import App from 'containers/app';

require('dotenv').config();

const root = document.getElementById('root');

ReactDOM.render(
  <App />,
root);
