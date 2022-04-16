import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { OwnerService } from 'src/app/services/owner.service';
import { PettypeService } from 'src/app/services/pettype.service';

@Component({
  selector: 'app-owner-create',
  templateUrl: './owner-create.component.html',
  styleUrls: ['./owner-create.component.css']
})
export class OwnerCreateComponent implements OnInit {

  pettypes: any;
  class = {
    name: '',
    pets: '' 
  };
  submitted = false;
  errors: any;  

  constructor(private ownerService: OwnerService, private pettypeService: PettypeService , public router: Router) { }

  ngOnInit(): void {
    this.getPettype();
  }

  handleClear(){
    // clearing the value
      this.class.name = ' ';
      this.class.pets = ' ';
  }
  getPettype(): void {
    this.pettypeService.readAll()
      .subscribe(
        items => {
          this.pettypes = items;
           console.log(items);         
        },
        error => {
          console.log(error);
        }
      );
  }

  createClass(): void {
    const data = {
      name: this.class.name,
      pets: this.class.pets
  };
  console.log(data['name']);
  console.log(data['pets']);
    this.ownerService.create(data)
      
      .subscribe(
        response => {
          console.log(response);
          this.submitted = true;
        },
        error => {
          this.errors = Object.values(error.error);
          console.log(this.errors);
        }
      );
    }

    newClass(): void {
      this.submitted = false;
      this.class = {
        name: '',
        pets: '' 
      };
    }

}
