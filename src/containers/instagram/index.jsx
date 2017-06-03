import React, { Component } from 'react';
import InstagramClient from 'node-instagram';
import InstagramItem from 'components/instagramItem';

class Instagram extends Component {

  constructor(props) {
    super(props);
    this.client = new InstagramClient({
      clientId: process.env.INSTAGRAM_CLIENT_ID,
      accessToken: process.env.INSTAGRAM_ACCESS_TOKEN,
    });
    this.state = {
      itemsLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    if (!this.state.itemsLoaded) {
      this.getPosts();
    }
  }

  getPosts() {
    const params = { count: 10 };
    this.client.get('users/self/media/recent', params)
    .then((posts) => {
      this.setState({
        items: posts.data,
        itemsLoaded: true,
      });
    })
    .catch((error) => {
      this.setState({
        itemsLoaded: true,
      });
      throw error;
    });
  }

  render() {
    const items = this.state.items.map(item => (
      <InstagramItem
        key={item.id}
        caption={item.caption ? item.caption.text : null}
        url={item.link}
        date={item.created_time}
        img={item.images.low_resolution.url}
        location={item.location ? item.location.name : null}
        likes={item.likes.count}
      />
    ));
    return (
      <div>
        <h2>Instagram</h2>
        {items}
      </div>
    );
  }
}

export default Instagram;
