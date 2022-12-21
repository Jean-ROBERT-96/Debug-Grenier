let HOST = require("../host.js");
let {account} = require("../account");
let {expect} = require('chai');

describe('visit vide grenier', () => {
   
    
    it('gets logo', async() => {
       
     
        cy.writeFile('logs.txt', JSON.stringify(account))
        expect("johan").equal(account.username);
       
         
  
      
      })
  })
  