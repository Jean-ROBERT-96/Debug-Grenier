let HOST = require("../host.js");
let {expect} = require('chai');

let {account} = require("../account");

describe('connexion', () => {
   
    
    it('logs user', {
        defaultCommandTimeout: 10000
      }, () => {
        cy.visit(HOST+'login');
        cy.get('#exampleInputEmail1').type(account.email);
        cy.get('#exampleInputPassword1').type(account.password);
        cy.get('[name=submit]').click();
        cy.get('#dropdownMenu1').should('exist');
        cy.visit(HOST);
        cy.get('.b-article').first().find('img').click()
        cy.get('[name=submit]').click();
        cy.get('[name=submit]').click();
        cy.contains("Votre email a bien été envoyé").should("exist");
      })
})