import './App.css';
import Card from "./Card.jsx";
import React, { useState, useEffect } from 'react';
import axios from 'axios';


function Articles() {
  const url = "http://localhost:3001/api/v1/articles/all";
  const [data, setData] = useState([]);

  const fetchInfo = () => {
    return axios.get(url).then((res) => setData(res.data));
  };

  useEffect(() => {
    fetchInfo();
  }, []);

  return (

    <div className='flex flex-wrap'>
      {data.map((dataObj, index) => {
        return (
          <Card dataObj={dataObj}/>
        );
      })}
    </div>

  );
}

export default Articles;
