import React, { Component } from 'react';
import ReactDOM from 'react-dom';

require('./styles');

class Box extends Component {
    render() {
        return (
            <div className="container">
                <div className="form-group">
                <h1 className="title">Shortener URL</h1>
                <form className="form-inline" action="" method="post">    
                    <input type="url" className="form-control" name="url" placeholder="Enter URL here"/>
                    <input className="btn btn-primary" type="submit" value="Short"/>
                </form>
                <form className="form-inline" action="" method="get">
                    <input type="url" className="form-control" name="codeOfUrl" placeholder="Enter short link"/>
                    <input className="btn btn-info" type="submit" value="Show website"/>
                </form>
                </div>
            </div>
        );
    }
}

ReactDOM.render(
    <Box />,
    document.getElementById('app')
);