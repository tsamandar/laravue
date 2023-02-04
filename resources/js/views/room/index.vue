<template>
  <div class="app-container">
    <div class="filter-container">
      <el-button class="filter-item" type="primary" icon="el-icon-plus" @click="handleCreateForm">
        {{ $t('table.add') }}
      </el-button>
    </div>

    <el-table v-loading="loading" :data="list" border fit highlight-current-row>

      <el-table-column align="center" label="ID" width="80">
        <template slot-scope="scope">
          <span>{{ scope.row.id }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Hotel ID">
        <template slot-scope="scope">
          <span>{{ scope.row.hotel_id }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Title">
        <template slot-scope="scope">
          <span>{{ scope.row.title }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Type">
        <template slot-scope="scope">
          <span>{{ scope.row.type }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Active">
        <template slot-scope="scope">
          <span>{{ scope.row.active }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Price">
        <template slot-scope="scope">
          <span>{{ scope.row.price }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Size">
        <template slot-scope="scope">
          <span>{{ scope.row.size }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Photo">
        <template slot-scope="scope">
          <span>{{ scope.row.photo }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Photo (2)">
        <template slot-scope="scope">
          <span>{{ scope.row.photo_second }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Color">
        <template slot-scope="scope">
          <span>{{ scope.row.color }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Square">
        <template slot-scope="scope">
          <span>{{ scope.row.square }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Status">
        <template slot-scope="scope">
          <span>{{ scope.row.status }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Cleaned">
        <template slot-scope="scope">
          <span>{{ scope.row.cleaned }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Cleaned type">
        <template slot-scope="scope">
          <span>{{ scope.row.cleaned_type }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Actions" width="350">
        <template slot-scope="scope">
          <el-button type="primary" size="small" icon="el-icon-edit"
            @click="handleEditForm(scope.row.id, scope.row.title);">
            Edit
          </el-button>
          <el-button type="danger" size="small" icon="el-icon-delete"
            @click="handleDelete(scope.row.id, scope.row.title);">
            Delete
          </el-button>
        </template>
      </el-table-column>

    </el-table>

    <el-dialog :title="formTitle" :visible.sync="roomFormVisible">
      <div class="form-container">
        <el-form ref="roomForm" :model="currentRoom" label-position="left" label-width="150px"
          style="max-width: 500px;">
          <el-form-item label="Title" prop="title">
            <el-input v-model="currentRoom.title" />
          </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
          <el-button @click="roomFormVisible = false">
            Cancel
          </el-button>
          <el-button type="primary" @click="handleSubmit()">
            Confirm
          </el-button>
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const roomResource = new Resource('rooms');

export default {
  name: 'RoomList',
  data() {
    return {
      list: [],
      loading: true,
      roomFormVisible: false,
      currentRoom: {},
      formTitle: '',
    };
  },
  created() {
    this.getList();
  },
  methods: {
    async getList() {
      this.loading = true;
      const { data } = await roomResource.list({});
      this.list = data;
      this.loading = false;
    },

    handleSubmit() {
      if (this.currentRoom.id !== undefined) {
        roomResource.update(this.currentRoom.id, this.currentRoom).then(response => {
          this.$message({
            type: 'success',
            message: 'Room info has been updated successfully',
            duration: 5 * 1000,
          });
          this.getList();
        }).catch(error => {
          console.log(error);
        }).finally(() => {
          this.roomFormVisible = false;
        });
      } else {
        roomResource
          .store(this.currentRoom)
          .then(response => {
            this.$message({
              message: 'New room ' + this.currentRoom.title + ' has been created successfully.',
              type: 'success',
              duration: 5 * 1000,
            });
            this.currentRoom = {
              title: ''
            };
            this.roomFormVisible = false;
            this.getList();
          })
          .catch(error => {
            console.log(error);
          });
      }
    },

    handleCreateForm() {
      this.roomFormVisible = true;
      this.currentRoom = {
        title: ''
      };
    },

    handleDelete(id, title) {
      this.$confirm('This will permanently delete category ' + title + '. Continue?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning',
      }).then(() => {
        roomResource.destroy(id).then(response => {
          this.$message({
            type: 'success',
            message: 'Delete completed',
          });
          this.getList();
        }).catch(error => {
          console.log(error);
        });
      }).catch(() => {
        this.$message({
          type: 'info',
          message: 'Delete canceled',
        });
      });
    },

    handleEditForm(id) {
      this.formTitle = 'Edit room';
      this.currentRoom = this.list.find(room => room.id === id);
      this.roomFormVisible = true;
    },
  },
};
</script>
