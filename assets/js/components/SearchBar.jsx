import React, { useState } from "react";

const SearchBar = ({ onChange }) => {
  return (
    <div className="row mt-5">
      <div className="col-5 mt-5">
        <input
          type="text"
          name="nameSearch"
          className="form-control"
          placeholder="Recherche par nom et prénom ..."
          onChange={onChange}
        />
      </div>
      <div className="col-5 mt-5">
        <input
          type="text"
          name="specialitySearch"
          className="form-control"
          placeholder="Recherche par specialité ..."
          onChange={onChange}
        />
      </div>
      <div className="col-2 mt-5">
        <button type="button" className="btn btn-primary">
          Rechercher
        </button>
      </div>
    </div>
  );
};

export default SearchBar;
