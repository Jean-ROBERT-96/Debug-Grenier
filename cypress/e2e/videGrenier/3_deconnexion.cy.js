let HOST = require("../host.js");
let {expect} = require('chai');

let {account} = require("../account");

describe('deconnexion', () => {
   
    
    it('logs user then decoonect', () => {
        cy.visit(HOST+'login');
        cy.get('#exampleInputEmail1').type(account.email);
        cy.get('#exampleInputPassword1').type(account.password);
        cy.get('[name=submit]').click();
        cy.get('#dropdownMenu1').click();
        cy.contains('Déconnexion').click();
        cy.get('#dropdownMenu1').should('not.exist');
      
      })
})