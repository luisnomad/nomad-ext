// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class HelloWorld extends Component {
  static slug = "noex_hello_world";

  render() {
    const { title, content: Content } = this.props;

    return (
      <div className="alert alert-success" role="alert">
        <h4 className="alert-heading">{title}</h4>
        <p>
          <Content />
          !!
        </p>
        <hr />
      </div>
    );
  }
}

export default HelloWorld;
