import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class Recipe extends Component {
    constructor(props) {
        super(props)
        this.state = { showDetails: false };
        this.state = { hover: false };
    }

    toggleDetails = () => {
        this.setState({ showDetails: !this.state.showDetails });
    }
    toggleHover = () => {
        this.setState({ hover: !this.state.hover });
    }

    render() {
        const details = this.state.showDetails ? <img style={{ width: 250 }} src={this.props.recipe.picture} alt='a recipe' /> : null;
        const hoverStyle = this.state.hover ? { background: 'yellow' } : null;
        return (
            <div >
                <h2>{this.props.recipe.name}</h2>
                <p>{this.props.recipe.instructions}</p>
                <div style={hoverStyle} onClick={this.toggleDetails} onMouseEnter={this.toggleHover} onMouseLeave={this.toggleHover}>
                    click {this.state.showDetails ? 'to hide' : 'for more details'}
                    {details}
                </div>
            </div>
        );
    }
}

Recipe.propTypes = {
    recipe: PropTypes.object,
};

