import React, { Component } from 'react';
import FlickrSDK from 'flickr-sdk';

class Flickr extends Component {

  constructor(props) {
    super(props);
    this.flickrSDK = new FlickrSDK({
      apiKey: process.env.FLICKR_API_KEY,
    });
    this.state = {
      itemsLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    if (!this.state.itemsLoaded) {
      this.getPhotos();
    }
  }

  getPhotos() {
    this.flickrSDK
    .request()
    .people('60468403@N04')
    .media()
    .get({
      page: 1,
      per_page: 5,
    })
    .then((response) => {
      this.setState({
        items: response.body.photos.photo,
        itemsLoaded: true,
      });
    });
  }

  render() {
    console.log(this.state.items);
    return (
      <div>
        <h2>Flickr</h2>
      </div>
    );
  }
}

export default Flickr;
