import React, { Component } from 'react';
import './App.css';
import Routes from './Routes';
import { Link } from 'react-router-dom';

class App extends Component {
  render() {
    return (
      <div>
        <h1>PCS Blogs</h1>
        <Link to="/blogs">Blogs</Link> | <Link to="/foo">Foo</Link> | <Link to="/test">Test</Link>
        <hr />
        {Routes}
      </div>
    );
  }
}

export default App;
