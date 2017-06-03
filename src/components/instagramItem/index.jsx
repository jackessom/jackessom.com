import React from 'react';
import PropTypes from 'prop-types';

function InstagramItem(props) {
  return (
    <a href={props.url} target="_blank" rel="noopener noreferrer">
      {props.location &&
        <p>{props.location}</p>
      }
      <img src={props.img} alt={props.caption} />
      {props.caption &&
        <p>{props.caption}</p>
      }
      <p>{`${props.date} - likes: ${props.likes}`}</p>
    </a>
  );
}

InstagramItem.propTypes = {
  caption: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.bool,
  ]),
  url: PropTypes.string.isRequired,
  img: PropTypes.string.isRequired,
  date: PropTypes.string.isRequired,
  location: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.bool,
  ]),
  likes: PropTypes.number.isRequired,
};

InstagramItem.defaultProps = {
  location: false,
  caption: false,
};

export default InstagramItem;
