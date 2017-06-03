import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Parser from 'html-react-parser';

const intentRegex = /twitter\.com\/intent\/(\w+)/;
const windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes';
const width = 550;
const height = 420;
const winHeight = screen.height;
const winWidth = screen.width;

class Tweet extends Component {

  static replaceUrl(tweet, url, displayUrl) {
    let tempTweet = tweet;
    const reg = new RegExp(url, 'g');
    tempTweet = tempTweet.replace(
      reg,
      `<a href="${url}" target="_blank">${displayUrl}</a>`,
    );
    return tempTweet;
  }

  static replaceUserMention(tweet, user) {
    let tempTweet = tweet;
    const reg = new RegExp(`@${user}`, 'g');
    tempTweet = tempTweet.replace(
      reg,
      `<a href="https://twitter.com/${user}" target="_blank">@${user}</a>`,
    );
    return tempTweet;
  }

  static replaceHashtag(tweet, hashtag) {
    let tempTweet = tweet;
    const reg = new RegExp(`#${hashtag}`, 'g');
    tempTweet = tempTweet.replace(
      reg,
      `<a href="https://twitter.com/hashtag/${hashtag}?src=hash" target="_blank">#${hashtag}</a>`,
    );
    return tempTweet;
  }

  static handleIntent(e) {
    e.preventDefault();
    let target = e.target || e.srcElement;
    let m;
    let left;
    let top;

    while (target && target.nodeName.toLowerCase() !== 'a') {
      target = target.parentNode;
    }

    if (target && target.nodeName.toLowerCase() === 'a' && target.href) {
      m = target.href.match(intentRegex);
      if (m) {
        left = Math.round((winWidth / 2) - (width / 2));
        top = 0;

        if (winHeight > height) {
          top = Math.round((winHeight / 2) - (height / 2));
        }
        window.open(
          target.href,
          'intent',
          `${windowOptions},width=${width},height=${height},left=${left},top=${top}`,
        );
      }
    }
  }

  formatTweet() {
    let formattedTweet = this.props.text;
    Object.keys(this.props.entities).forEach((entity) => {
      formattedTweet = this.props.entities[entity].reduce((prev, item) => {
        let newValue = prev;
        if (entity === 'urls') {
          newValue = Tweet.replaceUrl(prev, item.url, item.display_url);
        } else if (entity === 'hashtags') {
          newValue = Tweet.replaceHashtag(prev, item.text);
        } else if (entity === 'user_mentions') {
          newValue = Tweet.replaceUserMention(prev, item.screen_name);
        }
        return newValue;
      }, formattedTweet);
    });
    Object.keys(this.props.extendedEntities).forEach((entity) => {
      formattedTweet = this.props.extendedEntities[entity].reduce((prev, item) => {
        let newValue = prev;
        if (entity === 'media') {
          newValue = Tweet.replaceUrl(prev, item.url, item.display_url);
        }
        return newValue;
      }, formattedTweet);
    });
    return formattedTweet;
  }

  render() {
    const text = this.formatTweet();
    return (
      <div>
        <p>
          <a
            href={`https://twitter.com/jackessom/status/${this.props.id}`}
            target="_blank"
            rel="noopener noreferrer"
          >
            {this.props.date}
          </a>
        </p>
        { Parser(`<p>${text}</p>`) }
        <a href={`https://twitter.com/intent/tweet?in_reply_to=${this.props.id}`} onClick={Tweet.handleIntent}>Reply</a>
        <a href={`https://twitter.com/intent/retweet?tweet_id=${this.props.id}`} onClick={Tweet.handleIntent}>Retweet</a>
        <a href={`https://twitter.com/intent/like?tweet_id=${this.props.id}`} onClick={Tweet.handleIntent}>Like</a>
      </div>
    );
  }
}

Tweet.propTypes = {
  text: PropTypes.string.isRequired,
  id: PropTypes.string.isRequired,
  entities: PropTypes.object,
  extendedEntities: PropTypes.object,
  // favouriteCount: PropTypes.number.isRequired,
  // retweetCount: PropTypes.number.isRequired,
  date: PropTypes.string.isRequired,
};

Tweet.defaultProps = {
  entities: {},
  extendedEntities: {},
};

export default Tweet;
