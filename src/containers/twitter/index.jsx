import React, { Component } from 'react';
import TwitterClient from 'twitter';
import Tweet from 'components/tweet';

class Twitter extends Component {

  constructor(props) {
    super(props);
    this.client = new TwitterClient({
      consumer_key: process.env.TWITTER_CONSUMER_KEY,
      consumer_secret: process.env.TWITTER_CONSUMER_SECRET,
      access_token_key: process.env.TWITTER_ACCESS_TOKEN_KEY,
      access_token_secret: process.env.TWITTER_ACCESS_TOKEN_SECRET,
    });
    this.state = {
      itemsLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    if (!this.state.itemsLoaded) {
      this.getTweets();
    }
  }

  getTweets() {
    const params = { screen_name: 'jackessom', count: 4 };
    this.client.get('statuses/user_timeline', params)
    .then((tweets) => {
      this.setState({
        items: tweets,
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
      <Tweet
        key={item.id}
        id={item.id_str}
        text={item.text}
        entities={item.entities}
        extendedEntities={item.extended_entities}
        favouriteCount={item.favorite_count}
        retweetCount={item.retweet_count}
        date={item.created_at}
      />
    ));
    return (
      <div>
        <h2>Tweets</h2>
        {items}
      </div>
    );
  }
}

export default Twitter;
