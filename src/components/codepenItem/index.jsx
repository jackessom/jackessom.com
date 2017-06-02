import React from 'react';
import PropTypes from 'prop-types';

function CodepenItem(props) {
  let description;
  if (props.description.length > 0) {
    description = props.description;
  }
  return (
    <a href={props.url}>
      <h3>props.title</h3>
      <span>{props.date}</span>
      <img src={props.img} alt={`${props.title} - Codepen`} />
      {description &&
        <p>{description}</p>
      }
    </a>
  );
}

CodepenItem.propTypes = {
  title: PropTypes.string.isRequired,
  url: PropTypes.string.isRequired,
  img: PropTypes.string.isRequired,
  date: PropTypes.string.isRequired,
  description: PropTypes.string.isRequired,
};

export default CodepenItem;
