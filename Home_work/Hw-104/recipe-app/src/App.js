import React, { Component } from 'react';
import './App.css';
import Routes from './Routes';
import RecipeBook from './RecipeBook';
import { Link } from 'react-router-dom';

class App extends Component {
  render() {
    return (
      <div>
        <h1>PCS Recipes</h1>
        <hr />
        <RecipeBook />
      </div>
    );
  }
}

export default App;
