import React, { Component } from 'react';
import BlogInfo from './BlogInfo';
import Blog from './Blog';

export default class BlogList extends Component {
    state = { loading: true };

    fetchBlogs() {
        fetch('https://jsonplaceholder.typicode.com/users')
            .then(response => response.json())
            .then(json => {
                console.log(json);
                const blogs = json.map(blogInfo => ({
                    name: blogInfo.name,
                    website: blogInfo.website,
                    company: blogInfo.company.name,
                    id: blogInfo.id
                }));
                return this.setState({ blogs, loading: false });
            })
            .catch(error => {
                console.log('There has been a problem with your fetch operation: ', error.message);
                return this.setState({ loading: false, error });
            });
    }

    componentDidMount() {
        this.fetchBlogs();
    }

    renderLoading() {
        return <div>Please wait... Loading</div>;
    }

    renderError() {
        return <div>OOPS. Unable to load blogs<br />{this.state.error.message}</div>;
    }

    renderBlogs() {
        const blogs = this.state.blogs.map(blog => <li key={blog.id}><BlogInfo blog={blog} /></li>)

        return (
            <div>
                <ul>{blogs}</ul>
            </div>);
    }

    render() {
        if (this.state.loading) {
            return this.renderLoading();
        } else if (this.state.blogs) {
            return this.renderBlogs();
        } else {
            return this.renderError();
        }
    }
}
