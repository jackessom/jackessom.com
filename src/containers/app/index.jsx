import React, { Component } from 'react';

import Header from 'components/header';
// import CodepenSection from 'containers/codepen';
// import Twitter from 'containers/twitter';
// import Instagram from 'containers/instagram';
import Github from 'containers/github';

class App extends Component {

  componentDidMount() {
    console.log('App mounted');
  }

  render() {
    return (
      <div>
        <Header />
        <Github />
      </div>
    );
  }
}

export default App;
