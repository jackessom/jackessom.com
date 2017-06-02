import React from 'react';
import PropTypes from 'prop-types';

import './header.css';

function Header(props) {
  return (
    <div className="header">
      <h1>Hello, {props.name}</h1>
    </div>
  );
}

Header.propTypes = {
  name: PropTypes.string,
};

Header.defaultProps = {
  name: 'World',
};

export default Header;
