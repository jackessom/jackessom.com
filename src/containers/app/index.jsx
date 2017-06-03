import React, { Component } from 'react';

import Header from 'components/header';
// import CodepenSection from 'containers/codepen';
import Twitter from 'containers/twitter';

class App extends Component {

  componentDidMount() {
    console.log('App mounted');
  }

  render() {
    return (
      <div>
        <Header />
        <Twitter />
      </div>
    );
  }
}

export default App;
