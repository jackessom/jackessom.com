import React, { Component } from 'react';

import Header from 'components/header';

class App extends Component {

  componentDidMount() {
    console.log('test 2');
  }

  render() {
    return (
      <Header />
    );
  }
}

export default App;
