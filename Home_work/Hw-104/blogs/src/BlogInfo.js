import React, { Component } from 'react';
import { Link } from 'react-router-dom';

export default class BlogInfo extends Component {
    render() {
        return (
            <Link to={`/blog/${this.props.blog.id}`}>
                <h2 style={{ margin: 0 }}>{this.props.blog.name}</h2>
                {this.props.blog.website} <br />
                {this.props.blog.company}
            </Link >
        );
    }
}
