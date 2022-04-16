import { Component, OnInit } from '@angular/core';
import { PettypeService } from 'src/app/services/pettype.service';

@Component({
  selector: 'app-pettype-list',
  templateUrl: './pettype-list.component.html',
  styleUrls: ['./pettype-list.component.css']
})
export class PettypeListComponent implements OnInit {

  pettypes: any;
  currentPettype = null;
  currentIndex = -1;
  name = '';
  pettypeItem : any;

  constructor(private pettypeService: PettypeService) { }

  ngOnInit(): void {
    this.getPettype();
    // console.log(this.pettypes);
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

  setCurrentPettype(item, index): void {
    this.pettypeService.read(item.id)
      .subscribe(
        selectedPettype => {
          this.pettypeItem = selectedPettype.pettype;
          this.currentPettype = this.pettypeItem;
          console.log(this.currentPettype);
        },
        error => {
          console.log(error);
        }
      );
    this.currentIndex = index;
  }

}
