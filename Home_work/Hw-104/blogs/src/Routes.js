import React, { Component } from 'react';
import { Switch, Route, Redirect } from 'react-router-dom';
import BlogList from './BlogList';
import Blog from './Blog';

/*const Routes = (
    <div>
        <Route path="/" exact component={App} />
        <Route path="/app" component={App} />
    </div>
);*/

class Test extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <h1>Im a test! {this.props.value}</h1>
        );
    }
}

const theValue = 21;

const Routes = (
    <Switch>
        <Route path="/blogs" component={BlogList} />
        <Route path="/blog/:blogId" component={Blog} />
        <Route path="/test" render={() => <Test value={theValue} />} />
        <Redirect exact from="/" to="/blogs" />
        <Route render={() => <div>404</div>} />
    </Switch>
);

export default Routes;