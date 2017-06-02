import React, { Component } from 'react';
import CodepenItem from 'components/codepenItem';

class Codepen extends Component {

  constructor(props) {
    super(props);
    this.state = {
      itemsLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    if (!this.state.itemsLoaded) {
      this.getPens();
    }
  }

  getPens() {
    const url = 'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fcodepen.io%2Fmrjackess%2Fpublic%2Ffeed';
    fetch(url)
    .then(response => response.json())
    .then((data) => {
      const items = data.items.filter((item, index) => index < 4);
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

  render() {
    const items = this.state.items.map((item) => {
      const content = document.createElement('div');
      content.innerHTML = item.content;
      const img = content.getElementsByTagName('img')[0].src;
      const description = content.getElementsByTagName('p')[2].innerHTML.trim();
      return (
        <CodepenItem
          key={item.link}
          title={item.title}
          url={item.link}
          date={item.pubDate}
          img={img}
          description={description}
        />
      );
    });
    return (
      <div>
        <h2>Codepen</h2>
        {items}
      </div>
    );
  }
}

export default Codepen;
