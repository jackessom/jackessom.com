import React, { Component } from 'react';

class Github extends Component {

  constructor(props) {
    super(props);
    this.state = {
      itemsLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    if (!this.state.itemsLoaded) {
      this.getActivity();
    }
  }

  getActivity() {
    const url = 'https://api.github.com/users/jackessom/events?per_page=500';
    fetch(url)
    .then(response => response.json())
    .then((data) => {
      const items = data.filter(item => item.type === 'PushEvent');
      this.setState({
        items,
        itemsLoaded: true,
      });
    })
    .catch((error) => {
      console.log(error);
      this.setState({
        itemsLoaded: true,
      });
    });
  }

  // sort into months
  // for each month group commits by repo
  // get first date and last date
  // only show last 2 months
  // count months commits and months repos

  render() {
    this.state.items.forEach((item) => {
      console.log(item.repo.name);
    });
    console.log(this.state.items);
    return (
      <div>
        <h2>Github</h2>
      </div>
    );
  }
}

export default Github;
