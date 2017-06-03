import React, { Component } from 'react';

import Header from 'components/header';
// import CodepenSection from 'containers/codepen';
// import Twitter from 'containers/twitter';
import Instagram from 'containers/instagram';

class App extends Component {

  componentDidMount() {
    console.log('App mounted');
  }

  render() {
    return (
      <div>
        <Header />
        <Instagram />
      </div>
    );
  }
}

export default App;
