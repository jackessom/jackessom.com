import React, { Component } from 'react';

import Header from 'components/header';
import CodepenSection from 'containers/codepen';

class App extends Component {

  componentDidMount() {
    console.log('test 2');
  }

  render() {
    return (
      <div>
        <Header />
        <CodepenSection />
      </div>
    );
  }
}

export default App;
