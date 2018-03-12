import React, { Component } from 'react';
import Post from './Post';

export default class Blog extends Component {
    constructor(props) {
        super(props);
        console.log(props);
        this.state = { loading: true };
    }

    fetchPosts() {
        fetch(`https://jsonplaceholder.typicode.com/posts?userId=${this.props.match.params.blogId}`)
            .then(response => response.json())
            .then(posts => {
                console.log(posts);
                return this.setState({ posts, loading: false });
            })
            .catch(error => {
                console.log('There has been a problem with your fetch operation: ', error.message);
                return this.setState({ loading: false, error });
            });
    }

    componentDidMount() {
        this.fetchPosts();
    }

    componentWillReceiveProps(nextProps) {
        if (nextProps.match.params.blogId !== this.match.params.blogId) {
            this.fetchPosts();
        }
    }

    renderLoading() {
        return <div>Please wait... Loading</div>;
    }

    renderError() {
        return <div>OOPS. Unable to load posts<br />{this.state.error.message}</div>;
    }

    renderPosts() {
        const posts = this.state.posts.map(post => <li key={post.id.toString()}><Post post={post} /></li>)

        return (
            <div>
                <ul>{posts}</ul>
            </div>);
    }

    render() {
        if (this.state.loading) {
            return this.renderLoading();
        } else if (this.state.posts) {
            return this.renderPosts();
        } else {
            return this.renderError();
        }
    }
}
