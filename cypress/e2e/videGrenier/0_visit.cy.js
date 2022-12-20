let HOST = require("../host.js");
let {expect} = require('chai');

describe('visit vide grenier', () => {
   
    
    it('gets logo', async() => {
       
      cy.visit(HOST);
        //cy.get('img').should('have.length.at.least', 0);
        cy.get('img').then(e=>{
          expect(e.length).to.be.greaterThan(0);
        })
         
  
      
      })
  })
  